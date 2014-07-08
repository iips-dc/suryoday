        <!-- Wrapper for showing Menu Bar -->
        <div data-dojo-type="dijit/MenuBar" id="navMenu">
            <div data-dojo-type="dijit/MenuBarItem" data-dojo-props="onClick:function(){window.location.replace('../index');}">
                DashBoard
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>File</span>
                <div data-dojo-type="dijit/DropDownMenu" id="fileMenu">
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('file 1');}">File #1</div>
                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="onClick:function(){alert('file 2');}">File #2</div>
                </div>
            </div>
            <div data-dojo-type="dijit/PopupMenuBarItem">
                <span>Edit</span>
                <div data-dojo-type="dijit/DropDownMenu" id="editMenu">
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="iconClass:'dijitEditorIcon dijitEditorIconCut',
                                            onClick:function(){alert('cut!')}">Cut</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="iconClass:'dijitEditorIcon dijitEditorIconCopy',
                                            onClick:function(){alert('copy!')}">Copy</div>
                                    <div data-dojo-type="dijit/MenuItem" data-dojo-props="iconClass:'dijitEditorIcon dijitEditorIconPaste',
                                            onClick:function(){alert('paste!')}">Paste</div>
                </div>
            </div>
        </div>