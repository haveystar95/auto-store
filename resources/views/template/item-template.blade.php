<script type="text/x-template" id="item-template">
    <li class="tree-list">
        <div
                :class="{bold: isFolder}"
                class="item-tree"
                v-on:click="toggle(item.id)"
                :id="item.id">

            <button class="btn btn-light menu-button">- @{{ item.name }}
                <span v-if="isFolder">@{{ isOpen ? '-' :  '+'}}</span>
            </button>

        </div>
        <ul v-show="isOpen" v-if="isFolder">
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