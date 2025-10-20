<?php
require_once __DIR__ . '/../models/Trip.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../helpers.php';

class TripController {
    private $model;
    public function __construct(){ $this->model = new Trip(); requireAuth(); }

    public function index(){ $trips = $this->model->all(); require __DIR__ . '/../views/shared/trips_list.php'; }

    public function create(){ requireRole(['ADMIN']); require __DIR__ . '/../views/admin/trips_create.php'; }

    public function store(){ requireRole(['ADMIN']); $this->model->create($_POST); header('Location: ?p=trips'); }

    public function edit(){ requireRole(['ADMIN']); $id=intval($_GET['id']); $trip=$this->model->find($id); require __DIR__ . '/../views/admin/trips_edit.php'; }

    public function update(){ requireRole(['ADMIN']); $id=intval($_POST['id']); $this->model->update($id,$_POST); header('Location: ?p=trips'); }

    public function delete(){ requireRole(['ADMIN']); $id=intval($_GET['id']); $this->model->delete($id); header('Location: ?p=trips'); }
}
