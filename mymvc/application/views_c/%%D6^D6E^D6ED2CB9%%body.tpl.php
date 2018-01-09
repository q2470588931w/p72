<?php /* Smarty version 2.6.31, created on 2017-12-26 16:33:32
         compiled from Reception/body/body.tpl */ ?>

<link rel="stylesheet" href="<?php echo $this->_tpl_vars['cssUrl']; ?>
index/body.css" >
<link href="<?php echo $this->_tpl_vars['cssUrl']; ?>
index/style.css" rel="stylesheet" type="text/css" media="all" />
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="container">
                    <div id="portfoliolist">
                        <?php $_from = $this->_tpl_vars['men']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                        <div class="portfolio logo1" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="<?php echo $this->_tpl_vars['url']; ?>
static/role/<?php echo $this->_tpl_vars['val']['mImg']; ?>
"  alt="Image 2" />
                                <div class="label">
                                    <div class="label-text">
                                        <p class="text-title"><?php echo $this->_tpl_vars['val']['cName']; ?>
——<?php echo $this->_tpl_vars['val']['mName']; ?>
</p>
                                        <span class="text-category"><?php echo $this->_tpl_vars['val']['levalName']; ?>
——<?php echo $this->_tpl_vars['val']['modelName']; ?>
</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; unset($_from); ?>

<script src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['jsUrl']; ?>
jquery.mixitup.min.js"></script>
<script>
    <?php echo '
    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $(\'#portfoliolist\').mixitup({
                    targetSelector: \'.portfolio\',
                    filterSelector: \'.filter\',
                    effects: [\'fade\'],
                    easing: \'snap\',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {

                // Simple parallax effect
                $(\'#portfoliolist .portfolio\').hover(
                        function () {
                            $(this).find(\'.label\').stop().animate({bottom: 0}, 200, \'easeOutQuad\');
                            $(this).find(\'img\').stop().animate({top: -30}, 500, \'easeOutQuad\');
                        },
                        function () {
                            $(this).find(\'.label\').stop().animate({bottom: -40}, 200, \'easeInQuad\');
                            $(this).find(\'img\').stop().animate({top: 0}, 300, \'easeOutQuad\');
                        }
                );

            }

        };

        // Run the show!
        filterList.init();

    });
    '; ?>

</script>