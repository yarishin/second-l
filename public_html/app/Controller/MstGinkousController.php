<?php
class MstGinkousController extends AppController {
    public function index() {
        $this->set('User', $this->User->find('all'));
    }
}