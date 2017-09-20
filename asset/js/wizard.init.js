    $('.wizard').bootstrapWizard({
        'tabClass': 'nav wizard-nav',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',
         
        onInit : function(tab, navigation, index){
            
           //check number of tabs and fill the entire row
           var $total = navigation.find('li').length;
           $width = 100/$total;
           
           $display_width = $(document).width();
           
           if($display_width < 600 && $total > 3){
               $width = 50;
           }
           
        },
        onPrevious: function(tab, navigation, index){
            var aktif = navigation.find('li.active');
            aktif.removeClass("completed")
            aktif.nextAll().removeClass("completed");
            aktif.find('a > p').html(index + 2);
            aktif.prev().find('a > p').html(index + 1);

        },
        onNext: function(tab, navigation, index){
            // if(index == 3) {
            //     return validateStep3();
            // } else if(index == 4) {
            //     return validateStep4();
            // } else if(index == 5) {
            //     return validateStep5();
            // } else if(index == 7) {
            //     return validateStep7();
            // } 
            // return true;

            var aktif = navigation.find('li.active');
            aktif.addClass("completed")
            aktif.prevAll().addClass("completed");
            
            aktif.find('a > p').html('<i class="fa fa-check"></i>');
        },
        onTabClick : function(tab, navigation, index){
            return false;
        }, 
        onTabShow: function(tab, navigation, index) {            
            var $total = navigation.find('li').length;
            var $current = index + 1;
            
            var wizard = navigation.closest('.wizard');
            /*
             * If it's the first tab then hide the last button and show the next instead
             * If it's the last tab then hide the last button and show the finish instead
            */
            if ($current == 1) { 
                $(wizard).find('.btn-previous').hide();
                $(wizard).find('.btn-submit').hide();
            } else if($current >= $total) {
                $(wizard).find('.btn-next').hide();
                $(wizard).find('.btn-submit').show();
            } else {
                $(wizard).find('.btn-next').show();
                $(wizard).find('.btn-submit').hide();
                $(wizard).find('.btn-previous').show();
            }
        }
    });