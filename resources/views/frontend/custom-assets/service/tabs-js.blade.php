<script>
    const childFocus = document.querySelectorAll('[child-focus]');
    const body = document.body;
    const tabs = document.getElementById('tabs');
    const toggleTabsSelect = document.getElementById('toggleTabsSelect');

    if(childFocus){
        childFocus.forEach(el => {
            el.onclick = (e) => {
                toggleTabsSelect.checked = false;
                if (e.target == el) {
                el.firstElementChild.click();
                }
            };
        });
    }

</script>