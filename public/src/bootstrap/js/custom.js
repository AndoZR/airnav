$(function () {
    // Tampilkan semua tanpa klik — langsung lebar penuh sesuai permintaan
    $('.genealogy-tree ul').show().addClass('active');
    // Nonaktifkan klik toggle yang bikin harus klik untuk lebar
    // $('.genealogy-tree li').off('click');
    // Auto-fit: skala agar muat lebar tanpa scroll horizontal paksa
    function fitGenealogy(){
        $('.genealogy-body').each(function(){
            var $body = $(this);
            var $tree = $body.find('.genealogy-tree');
            if(!$tree.length) return;
            // reset scale dulu
            $tree.css('transform','scale(1)');
            var bodyW = $body.width() - 40; // padding
            var treeW = $tree[0].scrollWidth;
            if(treeW > bodyW && bodyW > 0){
                var scale = Math.max(0.55, Math.min(1, bodyW / treeW));
                $tree.css('transform','scale('+scale+')');
                // sesuaikan height wrapper agar tidak terpotong
                var treeH = $tree[0].scrollHeight;
                $body.css('min-height', (treeH * scale + 60) + 'px');
            } else {
                $tree.css('transform','scale(1)');
                $body.css('min-height','');
            }
        });
    }
    // jalankan setelah render & saat resize
    setTimeout(fitGenealogy, 350);
    $(window).on('resize', fitGenealogy);
    // jika ada gambar bagan di dalam, tunggu load
    $(window).on('load', fitGenealogy);
});