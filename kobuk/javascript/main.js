$(document).ready(function() {
    /* init sticky footer */
    initStickyFooter();

    /* init main navigation */
    initMainNavigation();

    /* init search wrapper */
    initSearchWrapper();

    /* init fancybox */
    initFancybox();

    /* init table responsive */
    initTableResponsive();

    /* init video */
    initVideo();

    /* init comment form */
    initCommentForm();

    /* resize handler */
    resizeHandler();
});

$(window).on('load', function() {
    /* init equal height elements */
    initEqualHeightElements();
});

$(window).on('orientationchange', resizeHandler);
$(window).on('resize', resizeHandler);

/* init sticky footer */
function initStickyFooter() {
    $('main').css('padding-bottom', $('footer').outerHeight());
}

/* init main navigation */
function initMainNavigation() {
    $('button.toggle.nav').click(function(e) {
        $('.main-navigation-wrapper').toggleClass('open');
    });
}

/* init search wrapper */
function initSearchWrapper() {
    $('button.toggle.search').click(function(e) {
        var searchWrapper = $('.search-wrapper');

        if(searchWrapper.hasClass('open')) {
            searchWrapper.find('form').submit();
        }
        else {
            searchWrapper.addClass('open');
        }
    });
}

/* init fancybox */
function initFancybox() {
    $('.content-area a > img').each(function(index) {
        $(this).closest('a').attr('data-fancybox', 'image');
    });

	$('[data-fancybox="image"], [data-fancybox="gallery"]').fancybox({
        buttons : [
            'fullScreen',
            'close'
        ],
	});

    $('[data-fancybox="video"]').fancybox({
        buttons: [
            'fullScreen',
            'close'
        ],
        afterLoad: function (instance, current) {
            current.$content.css({
                overflow: 'visible',
                background: '#000'
            });
        },
        onUpdate: function (instance, current) {
            var width,
                height,
                ratio = 16 / 9,
                video = current.$content;

            if (video) {
                video.hide();

                width = current.$slide.width();
                height = current.$slide.height();

                if (height * ratio > width) {
                    height = width / ratio;
                }
                else {
                    width = height * ratio;
                }

                video.css({
                    width: width,
                    height: height
                }).show();
            }
        }
    });
}

/* init table responsive */
function initTableResponsive() {
    $('.content-area table').each(function() {
        $(this).wrap('<div class="table-responsive"></div>');
    });
}

/* init video */
function initVideo() {
    $('.content-area iframe').each(function() {
        $(this).wrap('<div class="video-wrapper"></div>');
    });
}

/* init comment form */
function initCommentForm() {
    var locationHash =  window.location.hash;
    var commentForm = $('#commentform');

    if(commentForm.length !== 0) {
        $('#comment').attr('placeholder', $('.comment-form-comment label').text());
        $('#author').attr('placeholder', $('.comment-form-author label').text());
        $('#email').attr('placeholder', $('.comment-form-email label').text());
    }

    if(locationHash == '#comment-success') {
        $('.comment-form-wrapper .comment-form-success').removeClass('hidden');
    }
}

/* init equal height elements */
function initEqualHeightElements() {
    $('.equal-height-wrapper').each(function() {
        setEqualHeightElements($(this), '.equal-height-element-1');
        setEqualHeightElements($(this), '.equal-height-element-2');
    });
}

function setEqualHeightElements(parent, selector) {
    var elements = parent.find(selector);
    var maxHeight = 0;

    elements.css('min-height', '0'); /* reset */
    elements.each(function() {
        if($(this).outerHeight() > maxHeight) {
            maxHeight = $(this).outerHeight();
        }
    });
    elements.css('min-height', maxHeight + 'px');
}

/* scroll to element */
function scrollTo(element) {
    var top = 0;

    if($(element).length !== 0) {
        top = $(element).offset().top;

        $('html, body').animate({
            scrollTop: top
        }, 600);
    }
}

/* resize handler */
function resizeHandler() {
    /* init sticky footer */
    initStickyFooter();

    /* init equal height elements */
    initEqualHeightElements();
}