        <!-- Wrapper for showing Menu Bar -->
        <div data-dojo-type="dijit/MenuBar" id="navMenu">
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."index.php"; ?>');}">
                DashBoard
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>Baithak</span>
                <div data-dojo-type="dijit/DropDownMenu" id="baithakMenu">
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('Registration');}">Registration</div>
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('Add');}">Add</div>
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('Report');}">Report</div>
                </div>
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>HR</span>
                <div data-dojo-type="dijit/DropDownMenu" id="hrMenu">
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('cut!')}">Add Employee</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('copy!')}">Tasks</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('paste!')}">Report</div>
                </div>
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>Projects</span>
                <div data-dojo-type="dijit/DropDownMenu" id="projectMenu">
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('cut!')}">List</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('copy!')}">Donation</div>
                </div>
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>Donation</span>
                <div data-dojo-type="dijit/DropDownMenu" id="donationMenu">
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('cut!')}">For Project</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('copy!')}">For Trust</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('copy!')}">Offerings</div>
                </div>
            </div>
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."app/schedular/schedular.php"; ?>');}">
                Schedular
            </div>
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."index.php"; ?>');}">
                Report
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem" style="float:right">
                <span>Settings</span>
                <div data-dojo-type="dijit/DropDownMenu" id="settingMenu">
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){window.location.replace('<?php echo $PATH."php_scripts/logout.php"; ?>');}">Logout</div>
                </div>
            </div>
        </div>