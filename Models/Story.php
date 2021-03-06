<?php

use Narrit\Story\StoryRepository;

class Story extends DefaultModel
{
    function __construct()
    {
        parent::__construct(__FILE__);
//        $this->repository = new StoryRepository(__FILE__);
    }

    public function create($title, $description)
    {
        $sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function findById($id)
    {
        $sql = "SELECT *
                FROM story
                  JOIN pages ON pages.story_id = story.id
                  JOIN partials on partials.pages_id = pages.id
                WHERE story.id = " . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAll()
    {
        $sql = "
        SELECT * FROM partials 
            RIGHT JOIN pages ON pages . pages_id = partials . pages_id 
            RIGHT JOIN story ON pages . pages_id = story . pages_id
        WHERE story . user_id = 1
          ";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function saveStory($storyId, $pageId, $partials)
    {

        $array = [];
        foreach ($partials as $index => $partial) {

            $partialId = $partial['id'];
            $content = $partial['content'];

            $sql = "UPDATE partials
                    SET partials.content = :content
                    WHERE partials.id = :partialId 
                    AND partials.pages_id = :pagesId
                    AND partials.story_id = :storyId
                    "
            ;
            $req = Database::getBdd()->prepare($sql);

            array_push(
                $array,
                $req->execute([
                    'storyId' => $storyId,
                    'pagesId' => $pageId,
                    'partialId' => $partialId,
                    'content' => $content
                ]));
        }
        return $array;
    }
}

?>