<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <?php foreach($berita as $berita) { ?>
    <url>
        <loc><?php echo base_url()."berita/".$berita->slug_berita ?></loc>
        <priority>0.5</priority>
        <lastmod><?php echo $berita->tanggal_post;?></lastmod>
        <changefreq>daily</changefreq>
    </url>
    <?php } ?>
</urlset>
