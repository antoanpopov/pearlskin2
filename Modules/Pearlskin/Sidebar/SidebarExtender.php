<?php

namespace Modules\Pearlskin\Sidebar;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Pearlskin\Repositories\EmailMessageRepository;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {

        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->weight(50);
            $group->item(trans('pearlskin::emails.title.emails'), function (Item $item) {
                $item->weight(3);
                $item->icon('fa fa-envelope');
                $item->badge(function (Badge $badge, EmailMessageRepository $emailMessageRepository) {
                    $badge->setClass('bg-green');
                    $badge->setValue($emailMessageRepository->countUnread());
                });
                $item->route('admin.pearlskin.email.index');
                $item->authorize(
                    $this->auth->hasAccess('pearlskin.emails.index')
                );
            });
        });

        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('pearlskin::common.sidebar.content'), function (Item $item) {
                $item->icon('fa fa-newspaper-o');
                $item->weight(10);

                $item->item(trans('pearlskin::clients.title.clients'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.pearlskin.client.create');
                    $item->route('admin.pearlskin.client.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.clients.index')
                    );
                });
                $item->item(trans('pearlskin::doctors.title.doctors'), function (Item $item) {
                    $item->icon('fa fa-user-md');
                    $item->weight(0);
                    $item->append('admin.pearlskin.doctor.create');
                    $item->route('admin.pearlskin.doctor.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.doctors.index')
                    );
                });
                $item->item(trans('pearlskin::procedures.title.procedures'), function (Item $item) {
                    $item->icon('fa fa-heartbeat');
                    $item->weight(0);
                    $item->append('admin.pearlskin.procedure.create');
                    $item->route('admin.pearlskin.procedure.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.procedures.index')
                    );
                });
                $item->item(trans('pearlskin::manipulations.title.manipulations'), function (Item $item) {
                    $item->icon('fa fa-medkit');
                    $item->weight(0);
                    $item->append('admin.pearlskin.manipulation.create');
                    $item->route('admin.pearlskin.manipulation.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.manipulations.index')
                    );
                });
                $item->item(trans('pearlskin::schedules.title.schedules'), function (Item $item) {
                    $item->icon('fa fa-calendar-check-o');
                    $item->weight(0);
                    $item->append('admin.pearlskin.schedule.create');
                    $item->route('admin.pearlskin.schedule.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.schedules.index')
                    );
                });
                $item->item(trans('pearlskin::carousels.title.carousels'), function (Item $item) {
                    $item->icon('fa fa-eye');
                    $item->weight(0);
                    $item->append('admin.pearlskin.carousel.create');
                    $item->route('admin.pearlskin.carousel.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.schedules.index')
                    );
                });
                $item->item(trans('pearlskin::articles.title.articles'), function (Item $item) {
                    $item->icon('fa fa-newspaper-o');
                    $item->weight(0);
                    $item->append('admin.pearlskin.article.create');
                    $item->route('admin.pearlskin.article.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.articles.index')
                    );
                });
                $item->item(trans('pearlskin::addresses.title.addresses'), function (Item $item) {
                    $item->icon('fa fa-map-o');
                    $item->weight(0);
                    $item->append('admin.pearlskin.address.create');
                    $item->route('admin.pearlskin.address.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.addresses.index')
                    );
                });

            });
        });

        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('pearlskin::common.sidebar.layout'), function (Item $item) {
                $item->icon('fa fa-picture-o');
                $item->weight(10);
                $item->authorize(
                /* append */
                );
                $item->item(trans('pearlskin::positions.title.positions'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.pearlskin.position.create');
                    $item->route('admin.pearlskin.position.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.positions.index')
                    );
                });
                $item->item(trans('pearlskin::contentBlocks.title.contentBlocks'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.pearlskin.contentBlock.create');
                    $item->route('admin.pearlskin.contentBlock.index');
                    $item->authorize(
                        $this->auth->hasAccess('pearlskin.contentBlocks.index')
                    );
                });

            });
        });
        return $menu;
    }
}
