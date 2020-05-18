<?php
namespace Germania\Downloads;

use Germania\Worlds\PdoWorlds;
use Germania\Worlds\WorldsInterface;
use Germania\Categories\PdoCategories;

class PdoDownloads extends Downloads implements DownloadsInterface
{

    public $downloads  = array();
    public $categories;
    public $worlds;

    public $downloads_table            = "downloads";
    public $downloads_categories_table = "downloads_categories_mm";
    public $downloads_worlds_table     = "downloads_worlds_mm";


    /**
     * @param \PDO                   $pdo                        PDO instance
     * @param DownloadInterface|null $download                   Custom DownloadInterface instance (optional)
     * @param WorldsInterface|null   $worlds                     Custom 'Worlds' collection (optional)
     * @param string|null            $downloads_table            Download items table name (optional)
     * @param string|null            $downloads_categories_table Downlaods and Categories relations table name (optional)
     * @param string|null            $downloads_worlds_table     Downlaods and 'Worlds' relations table name (optional)
     */
    public function __construct( \PDO $pdo, DownloadInterface $download = null, WorldsInterface $worlds = null, $downloads_table = null, $downloads_categories_table = null, $downloads_worlds_table = null  )
    {

        $this->downloads_table            = $downloads_table            ?: $this->downloads_table;
        $this->downloads_categories_table = $downloads_categories_table ?: $this->downloads_categories_table;
        $this->downloads_worlds_table     = $downloads_worlds_table     ?: $this->downloads_worlds_table;

        // ID is listed twice here in order to use it with FETCH_UNIQUE as array key
        $sql = "SELECT DISTINCT
        D.id,
        D.id               AS id,
        D.download_type    AS type,
        D.download_name    AS name,
        D.download_description AS description,
        D.download_url         AS url,
        GROUP_CONCAT( DISTINCT DC.category_id SEPARATOR ',') AS category_ids,
        GROUP_CONCAT( DISTINCT DW.world_id    SEPARATOR ',') AS world_ids
        FROM {$this->downloads_table} D

        LEFT JOIN {$this->downloads_categories_table} DC
        ON D.id = DC.download_id

        LEFT JOIN downloads_worlds_mm DW
        ON D.id = DW.download_id

        WHERE D.is_active > 0
        GROUP BY D.id
        ORDER BY D.download_name ASC,
                 D.download_date DESC";

        $stmt = $pdo->prepare( $sql );

        $stmt->setFetchMode( \PDO::FETCH_CLASS, $download ? get_class($download) : Download::class );

        if (!$stmt->execute()):
            throw new \RuntimeException("Could not retrieve Downloads from database");
        endif;


        // Retrieve all from database
        $this->downloads = $stmt->fetchAll(\PDO::FETCH_UNIQUE);


        // Build category objects for each Download
        $this->categories = new PdoCategories( $pdo );
        foreach($this->downloads as $download):

            $download_cats = $download->getCategories();
            $category_ids = explode(",", $download->category_ids);

            while ($category_id = array_shift($category_ids))
                if ($this->categories->has( $category_id ))
                    $download_cats->push( $this->categories->get( $category_id ));
        endforeach;


        // Build Worlds objects for each Download
        $this->worlds = $worlds ?: new PdoWorlds( $pdo );
        foreach($this->downloads as $download):

            $download_worlds = $download->getWorlds();
            $world_ids = explode(",", $download->world_ids);

            while ($world_id = array_shift($world_ids))
                if ($this->worlds->has( $world_id ))
                    $download_worlds->push( $this->worlds->get( $world_id ));
        endforeach;


    }

}
