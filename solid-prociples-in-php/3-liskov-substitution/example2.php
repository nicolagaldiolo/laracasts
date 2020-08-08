<?php

interface LessonRepositoryInterface {
    /**
     * Fetch all records
     * @return array
     */
    public function getAll();
}

class FileLessonRepository implements LessonRepositoryInterface {
    public function getAll()
    {
        // return through filesystem
        return [];
    }
}

class DbLessonRepository implements LessonRepositoryInterface {
    public function getAll()
    {
        return Lesson::all(); // Viola il LSP in quanto torna una collection
    }
}