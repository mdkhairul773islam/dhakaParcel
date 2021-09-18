<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php msg(); ?>
                <div class="panal-header-title ">
                    <h1 class="pull-left">All Menus</h1>
                </div>
            </div>

            <div class="panel-body">
                <style>
                    @media all and (min-width: 768px) {
                        .align_items_wraper {column-count: 2;}
                    }
                    .align_items_wraper .items {
                        border: 1px solid #ccc;
                        margin-bottom: -1px;
                        padding: 10px;
                        display: flex;
                        cursor: move;
                        min-width: 100%;
                        align-items: center;
                        align-content: center;
                        justify-content: flex-start;
                    }
                    @media all and (min-width: 768px) {
                        .align_items_wraper .items {
                            -webkit-column-break-inside: avoid;
                            page-break-inside: avoid;
                        }
                    }
                    .align_items_wraper .items .icon {padding: 0 15px;}
                    div.drag-sort-active {
                        background: transparent;
                        color: transparent;
                    }
                </style>
                <div class="align_items_wraper">
                    <?php
                        if ($this->data['menus']){
                            foreach ($this->data['menus'] as $key => $value) {
                    ?>
                    <div class="items" data-id="<?php echo $value->id; ?>">
                        <div><?php echo $key+1; ?></div>
                        <div class="icon"><?php echo ($value->icon) ? "<span><i class='".$value->icon."'></i></span>" : "N/A"; ?></div>
                        <div><?php echo ($value->name) ? $value->name : ""; ?></div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    function enableDragSort(listClass) {
        const sortableLists = document.getElementsByClassName(listClass);
        Array.prototype.map.call(sortableLists, (list) => {enableDragList(list)});
    }

    function enableDragList(list) {
        Array.prototype.map.call(list.children, (item) => {enableDragItem(item)});
    }

    function enableDragItem(item) {
        item.setAttribute('draggable', true)
        item.ondrag = handleDrag;
        item.ondragend = handleDrop;
    }

    function handleDrag(item) {
        const selectedItem = item.target,
            list = selectedItem.parentNode,
            x = event.clientX,
            y = event.clientY;
        selectedItem.classList.add('drag-sort-active');
        let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);

        if (list === swapItem.parentNode) {
            swapItem = swapItem !== selectedItem.nextSibling ? swapItem : swapItem.nextSibling;
            list.insertBefore(selectedItem, swapItem);
        }
    }
    function handleDrop(item) {
        let dragSortEnable         = document.querySelector(".align_items_wraper"),
            dragSortEnableChildren = dragSortEnable.children,
            i                      = 0;

        item.target.classList.remove('drag-sort-active');
        for(i; i<dragSortEnableChildren.length; i++){
            dragSortEnableChildren[i].setAttribute('data-position', i);
        }
        updatePosition();
    }
    (()=> {enableDragSort('align_items_wraper')})();

    // update position in db by ajax start
    function updatePosition() {
        var getPosition = document.querySelectorAll(".align_items_wraper>.items"),
            positionObj = {},
            positionStr = '';
        Object.values(getPosition).forEach((value)=>{
            positionObj[value.dataset.id]=value.dataset.position;
        });
        positionStr = JSON.stringify(positionObj);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText==1){
                    location.reload();
                }
            }
        };
        xhttp.open("POST", "<?php echo site_url('system_aside_menu/menuController/ajax_alignment_process'); ?>", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`positionStr=${positionStr}`);
    }
</script>
