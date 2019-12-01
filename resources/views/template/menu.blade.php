<script id="v-menu" type="x/template">
    <div v-if="isSetMenu">


        <li>
            <div
                    :class="{bold: isFolder}"
                    @click="toggle"
            >
                @{{ items.name }}
                <span v-if="isFolder">[@{{ isOpen ? '-' : '+' }}]</span>
            </div>
            <ul v-show="isOpen" >
                <v-menu
                        class="items"
                        v-for="(child, index) in items.children"
                        :key="index"
                        :items="child"
                ></v-menu>
            </ul>
        </li>
    </div>


</script>