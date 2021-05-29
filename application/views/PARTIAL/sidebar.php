

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">WE <sup>PRo</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <?php for($i = 0 ; $i < count($MENU); $i++):?>
                <?php if($MENU[$i]['child'] != NULL):?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages<?=$i?>" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw <?=$MENU[$i]['icon']?>"></i>
                    <span><?=$MENU[$i]['label']?></span>
                </a>
                <div id="collapsePages<?=$i?>" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php for($j = 0 ; $j < count($MENU[$i]['child_menu']); $j++):?>
                            <a class="collapse-item" href="<?=$MENU[$i]['child_menu'][$j]['url']?>"><?=$MENU[$i]['child_menu'][$j]['label']?></a>
                        <?php endfor;?>
                    </div>
                </div>
            </li>
                <?php else:?>
                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$MENU[$i]['url']?>">
                            <i class="fas fa-fw <?=$MENU[$i]['icon']?>"></i>
                            <span><?=$MENU[$i]['label']?></span></a>
                        </li>
                <?php endif;?>
            <?php endfor;?>
            
            
            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
