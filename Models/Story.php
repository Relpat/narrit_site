<?php

class Story extends DefaultModel
{

    function __construct()
    {
        parent::__construct();

        $this->repository =

        $this->_DEBUG->debug($this->getDatabaseModelInformation(__FILE__));
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
                WHERE story.id = ".$id;
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

    public function edit($id, $title, $description)
    {
        $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}

?>