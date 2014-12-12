<?php
namespace Concrete\Controller\Panel;

use Concrete\Controller\Backend\UserInterface\Page as BackendInterfacePageController;
use Concrete\Core\Multilingual\Page\Section;
use Config;
use Core;

class Multilingual extends BackendInterfacePageController
{

    protected $viewPath = '/panels/multilingual';

    public function view()
    {
        $mlist = Section::getList();
        $currentSection = Section::getCurrentSection();
        foreach($mlist as $m) {
            if ($m->getCollectionID() != $currentSection->getCollectionID()) {
                $ml[] = $m;
            }
        }
        $this->set('list', $ml);
        $this->set('currentSection', $currentSection);
        $this->set('ih', Core::make('multilingual/interface/flag'));

        $multilingualController = Core::make('\Concrete\Controller\Backend\Page\Multilingual');
        $multilingualController->setPageObject($this->page);
        $this->set('multilingualController', $multilingualController);
    }

    protected function canAccess()
    {
        return $this->permissions->canViewToolbar() && Config::get('concrete.multilingual.enabled');
    }

}

