<?php
namespace controllers\heritable;

interface resource {

    public function edit($id);

    public function add();

    public function delete($id);
}
