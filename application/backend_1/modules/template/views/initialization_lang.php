<script>
    var langkey =<?= json_encode($this->session->userdata('langkey')) ?>;
    function get_langkey(key, rs = 'this is undefined') {
    if (typeof langkey === 'undefined'){return  rs }
    key = key.toLowerCase().split('|');
    var str = '';
    for (var i = 0; i < key.length; i++){
        if (langkey[key[i]] !== undefined){str += langkey[key[i]] + ' '; }
        else{str += key[i] + ' '; }
    }
    str = str.trim();
    return str != '' ? str : key;
    }
</script>