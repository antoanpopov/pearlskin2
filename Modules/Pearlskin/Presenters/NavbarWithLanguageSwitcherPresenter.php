<?php
/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 2.1.2017 г.
 * Time: 19:40
 */

namespace Modules\Pearlskin\Presenters;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Nwidart\Menus\MenuItem;
use Nwidart\Menus\Presenters\Presenter;

class NavbarWithLanguageSwitcherPresenter extends Presenter
{
    public function setLocale($item)
    {
        if (starts_with($item->url, 'http')) {
            return;
        }
        if (LaravelLocalization::hideDefaultLocaleInURL() === false) {
            $item->url = locale() . '/' . preg_replace('%^/?' . locale() . '/%', '$1', $item->url);
        }
    }

    /**
     * {@inheritdoc }.
     */
    public function getOpenTagWrapper()
    {
        return PHP_EOL . '<ul class="nav navbar-nav">' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getCloseTagWrapper()
    {
//        return PHP_EOL. '</ul>' . PHP_EOL;
        return PHP_EOL . $this->getLanguageSwitcher() . '</ul>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li' . $this->getActiveState($item) . '><a href="' . $item->getUrl() . '" ' . $item->getAttributes() . '>' . $item->getIcon() . ' ' . $item->title . '</a></li>' . PHP_EOL;
    }

    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class="active"')
    {
        return $item->isActive() ? $state : null;
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'active')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getDividerWrapper()
    {
        return '<li class="divider"></li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getHeaderWrapper($item)
    {
        return '<li class="dropdown-header">' . $item->title . '</li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {
        return '<li class="dropdown' . $this->getActiveStateOnChild($item, ' active') . '">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					' . $item->getIcon() . ' ' . $item->title . '
			      	<b class="caret"></b>
			      </a>
			      <ul class="dropdown-menu">
			      	' . $this->getChildMenuItems($item) . '
			      </ul>
		      	</li>'
            . PHP_EOL;
    }

    /**
     * Get multilevel menu wrapper.
     *
     * @param \Nwidart\Menus\MenuItem $item
     *
     * @return string`
     */
    public function getMultiLevelDropdownWrapper($item)
    {
        return '<li class="dropdown' . $this->getActiveStateOnChild($item, ' active') . '">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					' . $item->getIcon() . ' ' . $item->title . '
			      	<b class="caret pull-right caret-right"></b>
			      </a>
			      <ul class="dropdown-menu">
			      	' . $this->getChildMenuItems($item) . '
			      </ul>
		      	</li>'
            . PHP_EOL;
    }

    public function getLanguageSwitcher()
    {
        $languageSwitcher = '<li class="dropdown">
                <a href="#" 
                   class="dropdown-toggle"
                   data-toggle="dropdown" 
                   role="button"
                   aria-haspopup="true"
                   aria-expanded="false">' . LaravelLocalization::getCurrentLocaleName() .
            '<span class="caret" ></span >
                </a >
                <ul class="dropdown-menu" >';
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $languageSwitcher .= '<li class="' . (\App::getLocale() == $localeCode ? 'active' : '') . '">';
            $languageSwitcher .= '<a rel="alternate" lang="' . $localeCode . '" href="' . LaravelLocalization::getLocalizedURL($localeCode) . '">';
            $languageSwitcher .= $properties['native'] . '</a></li>';
        }

        return $languageSwitcher;
    }
}
