        <!-- Wrapper for showing Menu Bar -->
        <div data-dojo-type="dijit/MenuBar" id="navMenu">
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."index.php"; ?>');}">
                DashBoard
            </div>

            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/baithak/index.php"; ?>');}">
                Baithak
            </div>

            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/human_resource/index.php"; ?>');}">
                HR
            </div>

            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/public_relation/index.php"; ?>');}">
                PR
            </div>

            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/donation/index.php"; ?>');}">
                Donations
            </div>

            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."index.php"; ?>');}">
                Projects
            </div>

            <!-- <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>Baithak</span>
                <div data-dojo-type="dijit/DropDownMenu" id="baithakMenu">
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/baithak/index.php"; ?>');}">Registration</div>
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('Add');}">Add</div>
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('Report');}">Report</div>
                </div>
            </div> -->
            
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/schedular/schedular.php"; ?>');}">
                Schedular
            </div>
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."index.php"; ?>');}">
                Report
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem" style="float:right">
                <span>Settings</span>
                <div data-dojo-type="dijit/DropDownMenu" id="settingMenu">
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo "php_scripts/logout.php"; ?>');}">Logout</div>
                </div>
            </div>
        </div>