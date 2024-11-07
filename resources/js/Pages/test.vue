<template>
<div>
    <div id="editor"></div>
    <button @click="submit">Submit</button>
</div>
</template>


<script>
import {
    Inertia
} from '@inertiajs/inertia';

export default {
    data() {
        return {

        };
    },
    mounted() {
        console.log('jQuery:', window.jQuery);
        console.log('Trumbowyg:', window.jQuery ? window.jQuery.fn.trumbowyg : 'Trumbowyg not found');
        const checkLibraryLoaded = setInterval(() => {
            if (typeof window.jQuery !== "undefined" && typeof window.jQuery.fn.trumbowyg === "function") {
                clearInterval(checkLibraryLoaded);
                this.initializeTrumbowyg();
                this.initializeDatepicker();
            }
        }, 100);
    },
    methods: {
        initializeTrumbowyg() {
            window.jQuery('#editor').trumbowyg({
                btnsDef: {
                    image: {
                        dropdown: ['insertImage', 'base64'],
                        ico: 'insertImage'
                    }
                },
                btns: [
                    ['historyUndo', 'historyRedo'],
                    ['fontfamily'],
                    ['indent', 'outdent'],
                    ['foreColor', 'backColor'],
                    ['emoji'],
                    ['fontsize'],
                    ['viewHTML'],
                    ['formatting'],
                    ['bold', 'italic', 'underline'],
                    ['link'],
                    ['image'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ],
                autogrow: true,
                resetCss: false,
                plugins: {
                    resizimg: {
                        minSize: 64,
                        step: 16,
                    },
                    base64: true,
                    fontfamily: {},
                    fontsize: {
                        allowCustomSize: true
                    },
                    colors: {}
                }
            });
            window.jQuery(document).on('trumbowyg.init', function () {
                window.jQuery('#editor').find('img').each(function () {
                    window.jQuery(this).resizable({
                        handles: 'all',
                        aspectRatio: true
                    }).draggable({
                        containment: 'parent'
                    });
                });
            });
        },
        initializeDatepicker() {
            window.jQuery('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                onSelect: (dateText) => {
                    this.selectedDate = dateText;
                }
            });
        },
        submit() {
        }
    },
};
</script>


<style scoped>
#editor {
    height: 300px;
}
</style>
