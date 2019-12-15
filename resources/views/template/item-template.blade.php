<script type="text/x-template" id="item-template">
    <li class="tree-list" >
        <div  v-show="item.name!='Меню'"
                :class="{bold: isFolder}"
                class="item-tree"
                @click="toggle(item.id)"
                :id="item.id">

            <button v-if="isFolder" class="btn  btn-light menu-button menu-button-parent"><b> @{{ item.name }}</b>
                <span v-if="isFolder">@{{ isOpen ? '-' :  '+'}}</span>
            </button>

            <button v-else class="btn  btn-light menu-button"> - @{{ item.name }}
            </button>

        </div>
        <ul v-if="(isOpen && isFolder) || item.name=='Меню'">
            <tree-item
                    class="item"
                    v-for="(child, index) in item.children"
                    :key="index"
                    :item="child"
                    @make-folder="$emit('make-folder', $event)"
                    @add-item="$emit('add-item', $event)"
            ></tree-item>
        </ul>
    </li>
</script>