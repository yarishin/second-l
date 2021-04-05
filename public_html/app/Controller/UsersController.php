<?php
request->is('post'){
            $this->User->create($this->request->data);
            if($this->User->save()){
                $this->Session->setFlash('image upload!');
            }
        }
    }
}
