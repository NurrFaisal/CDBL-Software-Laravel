/*          Header Dropdown        */


/*$(document).ready(function (e) {
    $("#dropdown-fst").click(function () {
        $("#whyAlhaj").slideToggle("300");
        $("#rotate").toggleClass("icon-rotate");
        e.stopPropagation();
    })
})*/

$(document).ready(function(){
    // Show hide popover
    $(".dropdown").click(function(){
        $(this).find(".custom-dropdown").slideToggle("300");
        $("#backdrop").addClass("backdrop-on");
    });
});
$(document).on("click", function(event){
    var $trigger = $(".dropdown");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(this).find(".custom-dropdown").slideUp("300");
        $("#backdrop").removeClass("backdrop-on");
    }
});

$("#whyAlhaj").click(function () {
    $("#servicesDropdown").hide();
    $("#guidelinesDropdown").hide();
})

$("#services").click(function () {
    $("#whyAlhajDropdown").hide();
    $("#guidelinesDropdown").hide();
})

$("#guidelines").click(function () {
    $("#whyAlhajDropdown").hide();
    $("#servicesDropdown").hide();
})



/*          Contact         */
//===========================


var formContainer = $('#form-container');

bindFormClick();
//Opening the form
function bindFormClick(){
    $(formContainer).on('click', function(e) {
        e.preventDefault();
        toggleForm();
        //Ensure container doesn't togleForm when open
        $(this).off();
    });
}

/*          Overview Start          */
/*=====================================*/
const card = document.getElementById('cardWrap')

window.addEventListener('mousemove', (e) => {
    let x = e.pageX - (innerWidth / 2)
    let y = e.pageY - (innerHeight / 2)
    card.style.transform =`translate(${x / 40}px, ${y / 40}px)`
})

/*          Overview End          */
/*=====================================*/


//    File Upload
var _validFileExtensions = [".xml"];
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }

    return true;
}


var _validFileExtensions = [".xml"];
function Validate(oForm) {
    var arrInputs = oForm.getElementById("et_pb_contact_brand_file_request_0");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }

    return true;
}

$(document).ready(function() {
    $('input[type="file"]').on('click', function() {
        $(".file_names").html("");
    })
    if ($('input[type="file"]')[0]) {
        var fileInput = document.querySelector('label[for="et_pb_contact_brand_file_request_0"]');
        fileInput.ondragover = function() {
            this.className = "et_pb_contact_form_label changed";
            return false;
        }
        fileInput.ondragleave = function() {
            this.className = "et_pb_contact_form_label";
            return false;
        }
        fileInput.ondrop = function(e) {
            e.preventDefault();
            var fileNames = e.dataTransfer.files;
            for (var x = 0; x < fileNames.length; x++) {
                console.log(fileNames[x].name);
                $=jQuery.noConflict();
                $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames[x].name +"</div>");
            }
        }
        $('#et_pb_contact_brand_file_request_0').change(function() {
            var fileNames = $('#et_pb_contact_brand_file_request_0')[0].files[0].name;
            $('label[for="et_pb_contact_brand_file_request_0"]').append("<div class='file_names'>"+ fileNames +"</div>");
            $('label[for="et_pb_contact_brand_file_request_0"]').css('background-color', '##eee9ff');
        });
    }
});


function preview_ac_image_holder() {
    ac_image_holder.src=URL.createObjectURL(event.target.files[0]);
}
function preview_pass_driving_img_font() {
    pass_driving_img_font.src=URL.createObjectURL(event.target.files[0]);
}
function preview_pass_driving_img_back() {
    pass_driving_img_font_back.src=URL.createObjectURL(event.target.files[0]);
}
function preview_holder_signature() {
    holder_signature.src=URL.createObjectURL(event.target.files[0]);
}
function preview_holder_cheque_book_leaf() {
    holder_cheque_book_leaf.src=URL.createObjectURL(event.target.files[0]);
}
function preview_joint_holder_img() {
    joint_holder_img.src=URL.createObjectURL(event.target.files[0]);
}
function preview_joint_pass_driving_font() {
    joint_pass_driving_font.src=URL.createObjectURL(event.target.files[0]);
}
function preview_joint_pass_driving_back() {
    joint_pass_driving_back_image.src=URL.createObjectURL(event.target.files[0]);
}
function preview_joint_signature() {
    joint_signature.src=URL.createObjectURL(event.target.files[0]);
}
function preview_last_degree_attachment() {
    last_degree_attachment.src=URL.createObjectURL(event.target.files[0]);
}
function preview_user_photo_attachment() {
    user_photo_attachment.src=URL.createObjectURL(event.target.files[0]);
}
function preview_bank_slip() {
    bank_slip.src=URL.createObjectURL(event.target.files[0]);
}
function preview_beftn_slip() {
    beftn_slip.src=URL.createObjectURL(event.target.files[0]);
}

$('#bankInformation').hide();
$('#jointAccountHolder').hide();
$('#documentDeatils').hide();
// $('#firstNomineeMinor').hide();
// $('#secondNominee').hide();
// $('#secondNomineeMinor').hide();
$('#documentDetailsJointAC').hide();

$(document).ready(function(){
    $('#firstHolder').change(function(){
        if(this.checked)
            $('#firstAccountHolder').fadeIn('slow');
        else
            $('#firstAccountHolder').fadeOut('slow');

    });

    $('#joinHolder').change(function(){

        if(this.checked)
            $('#jointAccountHolder').fadeIn('slow');
        else
            $('#jointAccountHolder').fadeOut('slow');

    });

    $('#bankInfo').change(function(){
        if(this.checked)
            $('#bankInformation').fadeIn('slow');
        else
            $('#bankInformation').fadeOut('slow');

    });

    $('#document').change(function(){
        if(this.checked)
            $('#documentDeatils').fadeIn('slow');
        else
            $('#documentDeatils').fadeOut('slow');

    });


    $('#jointCheck').change(function(){
        if(this.checked)
            $('#joint').fadeIn('slow');
        else
            $('#joint').fadeOut('slow');

    });


    //Nominee Add Section

    $('#firstNomineeYesMinor').change(function(){
        if(this.checked)
            $('#firstNomineeMinor').fadeIn('slow');
    });


    $('#firstNomineeNotMinor').change(function(){
        if(this.checked)
            $('#firstNomineeMinor').fadeOut('slow');
    });

    //Second Nominee

    $('#SecondNomineeYes').change(function(){
        if(this.checked)
            $('#secondNominee').fadeIn('slow');
    });

    $('#SecondNomineeNot').change(function(){
        if(this.checked)
            $('#secondNominee').fadeOut('slow');
    });

//    Second Nominee Minor

    $('#secondNomineeYesMinor').change(function(){
        if(this.checked)
            $('#secondNomineeMinor').fadeIn('slow');
    });

    $('#secondNomineeNotMinor').change(function(){
        if(this.checked)
            $('#secondNomineeMinor').fadeOut('slow');
    });

//    Document Details Upload

    $('#firstHolderDocument').change(function(){
        if(this.checked)
            $('#documentDetailsFirstAC').fadeIn('slow');
        else
            $('#documentDetailsFirstAC').fadeOut('slow');

    });

    $('#joinHolderDocument').change(function(){
        if(this.checked)
            $('#documentDetailsJointAC').fadeIn('slow');
        else
            $('#documentDetailsJointAC').fadeOut('slow');

    });

});

var imgs = document.getElementById("imageValueCheck").value;
if(imgs != null ){
    document.getElementById("joinHolderDocument").checked = true;
    document.getElementById("documentDetailsJointAC").style.display = 'block';
}


//Deposit Amount


// $('#bank').hide()
// $('#beftn').hide()

$(function() {
    $('#depositSelector').change(function(){
        $('.deposit').hide();
        $('#' + $(this).val()).show();
    });
});


/*          Overview Count          */


const animationDuration = 4000;

const frameDuration = 1000 / 60;

const totalFrames = Math.round(animationDuration / frameDuration);

const easeOutQuad = (t) => t * (2 - t);

const animateCountUp = (el) => {
    let frame = 0;
    const countTo = parseInt(el.innerHTML, 10);

    const counter = setInterval(() => {
        frame++;

        const progress = easeOutQuad(frame / totalFrames);

        const currentCount = Math.round(countTo * progress);

        if (parseInt(el.innerHTML, 10) !== currentCount) {
            el.innerHTML = currentCount;
        }

        if (frame === totalFrames) {
            clearInterval(counter);
        }
    }, frameDuration);
};

const countupEls = document.querySelectorAll(".timer");
countupEls.forEach(animateCountUp);


/*          Slow Scroll         */

/*(function($) {

    var self = this,
        container, running = false,
        currentY = 0,
        targetY = 0,
        oldY = 0,
        maxScrollTop = 0,
        minScrollTop, direction, onRenderCallback = null,
        fricton = 0.85,
        vy = 0,
        stepAmt = 1,
        minMovement = 0.1,
        ts = 0.1;

    var updateScrollTarget = function(amt) {
        targetY += amt;
        vy += (targetY - oldY) * stepAmt;

        oldY = targetY;
    }
    var render = function() {
        if (vy < -(minMovement) || vy > minMovement) {

            currentY = (currentY + vy);
            if (currentY > maxScrollTop) {
                currentY = vy = 0;
            } else if (currentY < minScrollTop) {
                vy = 0;
                currentY = minScrollTop;
            }

            container.scrollTop(-currentY);

            vy *= fricton;

            if (onRenderCallback) {
                onRenderCallback();
            }
        }
    }
    var animateLoop = function() {
        if (!running) return;
        requestAnimFrame(animateLoop);
        render();
        //log("45","animateLoop","animateLoop", "",stop);
    }
    var onWheel = function(e) {
        e.preventDefault();
        var evt = e.originalEvent;

        var delta = evt.detail ? evt.detail * -1 : evt.wheelDelta / 40;
        var dir = delta < 0 ? -1 : 1;
        if (dir != direction) {
            vy = 0;
            direction = dir;
        }

        //reset currentY in case non-wheel scroll has occurred (scrollbar drag, etc.)
        currentY = -container.scrollTop();
        updateScrollTarget(delta);
    }

    /!*
     * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
     *!/
    window.requestAnimFrame = (function() {
        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            function(callback) {
                window.setTimeout(callback, 5000 / 200);
            };
    })();

    /!*
     * http://jsbin.com/iqafek/2/edit
     *!/
    var normalizeWheelDelta = function() {
        // Keep a distribution of observed values, and scale by the
        // 33rd percentile.
        var distribution = [],
            done = null,
            scale = 3000;
        return function(n) {
            // Zeroes don't count.
            if (n == 0) return n;
            // After 500 samples, we stop sampling and keep current factor.
            if (done != null) return n * done;
            var abs = Math.abs(n);
            // Insert value (sorted in ascending order).
            outer: do { // Just used for break goto
                for (var i = 0; i < distribution.length; ++i) {
                    if (abs <= distribution[i]) {
                        distribution.splice(i, 0, abs);
                        break outer;
                    }
                }
                distribution.push(abs);
            } while (false);
            // Factor is scale divided by 33rd percentile.
            var factor = scale / distribution[Math.floor(distribution.length / 3)];
            if (distribution.length == 5000) done = factor;
            return n * factor;
        };
    }();


    $.fn.smoothWheel = function() {
        //  var args = [].splice.call(arguments, 0);
        var options = jQuery.extend({}, arguments[0]);
        return this.each(function(index, elm) {

            if (!('ontouchstart' in window)) {
                container = $(this);
                container.bind("mousewheel", onWheel);
                container.bind("DOMMouseScroll", onWheel);

                //set target/old/current Y to match current scroll position to prevent jump to top of container
                targetY = oldY = container.scrollTop();
                currentY = -targetY;

                minScrollTop = container.get(0).clientHeight - container.get(0).scrollHeight;
                if (options.onRender) {
                    onRenderCallback = options.onRender;
                }
                if (options.remove) {
                    log("122", "smoothWheel", "remove", "");
                    running = false;
                    container.unbind("mousewheel", onWheel);
                    container.unbind("DOMMouseScroll", onWheel);
                } else if (!running) {
                    running = true;
                    animateLoop();
                }

            }
        });
    };

})(jQuery);*/


$(document).ready(function(){
    $(window).smoothWheel();
});


/*          Header          */

/*
$(window).scroll(function () {
    var sc = $(window).scrollTop()
    if (sc > 150) {
        $("#main-navbar").addClass("navbar-scroll")
    }
    else {
        $("#main-navbar").removeClass("navbar-scroll")
    }
});
*/

(function(){

    var doc = document.documentElement;
    var w = window;

    var prevScroll = w.scrollY || doc.scrollTop;
    var curScroll;
    var direction = 0;
    var prevDirection = 0;

    var header = document.getElementById('main-navbar');

    var checkScroll = function() {

        /*
        ** Find the direction of scroll
        ** 0 - initial, 1 - up, 2 - down
        */

        curScroll = w.scrollY || doc.scrollTop;
        if (curScroll > prevScroll) {
            //scrolled up
            direction = 2;
        }
        else if (curScroll < prevScroll) {
            //scrolled down
            direction = 1;
        }

        if (direction !== prevDirection) {
            toggleHeader(direction, curScroll);
        }

        prevScroll = curScroll;
    };

    var toggleHeader = function(direction, curScroll) {
        if (direction === 2 && curScroll > 1) {

            //replace 52 with the height of your header in px

            header.classList.add('hide');
            prevDirection = direction;
        }
        else if (direction === 1) {
            header.classList.remove('hide');
            prevDirection = direction;
        }
    };

    window.addEventListener('scroll', checkScroll);

})();


/*          Header Dropdown        */


/*$(document).ready(function (e) {
    $("#dropdown-fst").click(function () {
        $("#whyAlhaj").slideToggle("300");
        $("#rotate").toggleClass("icon-rotate");
        e.stopPropagation();
    })
})*/

$(document).ready(function(){
    // Show hide popover
    $(".dropdown").click(function(){
        $(this).find(".custom-dropdown").slideToggle("300");
    });
});
$(document).on("click", function(event){
    var $trigger = $(".dropdown");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(this).find(".custom-dropdown").slideUp("300");
    }
});


$("#whyAlhaj").click(function () {
    $("#servicesDropdown").hide()
    $("#guidelinesDropdown").hide()
})

$("#services").click(function () {
    $("#whyAlhajDropdown").hide()
    $("#guidelinesDropdown").hide()
})

$("#guidelines").click(function () {
    $("#whyAlhajDropdown").hide()
    $("#servicesDropdown").hide()
})


/*          Guidelines Page Start           */
//===========================================


const sections = document.querySelectorAll("section", {
    rootMargin: "0 0 -50% 0"
});

const nav = document.querySelector(".custom-guideline-nav");

const intersectionCallback = (sections) => {
    sections
        .filter((section) => section.isIntersecting)
        .map((section) => section.target.id)
        .forEach((sectionId) => {
            const sectionLinkContainer = nav.querySelector(`a[href$=${sectionId}]`).parentElement;
            sectionLinkContainer.classList.add("visible");
        });

    sections
        .filter((section) => !section.isIntersecting)
        .map((section) => section.target.id)
        .forEach((sectionId) => {
            const sectionLinkContainer = nav.querySelector(`a[href$=${sectionId}]`).parentElement;
            sectionLinkContainer.classList.remove("visible");
        });
};

const sectionObserver = new IntersectionObserver(intersectionCallback);

sections.forEach((section) => sectionObserver.observe(section));



$("#section-1-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#section-1").offset().top
    }, 2000);
});

$("#section-2-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#section-2").offset().top
    }, 2000);
});

$("#section-3-link").click(function() {
    $('html, body').animate({
        scrollTop: $("#section-3").offset().top
    }, 2000);
});
/*          Guidelines Page Start           */
//===========================================



/*          Left Client Sidebar Dropdown           */
//===============================




$(document).ready(function(){
    // Show hide popover
    $(".left-menu").click(function(){
        $(this).find(".custom-dropdown-client-dashboard").hide("300");
    });
});
$(document).on("click", function(event){
    var $trigger = $(".left-menu");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(this).find(".custom-dropdown-client-dashboard").slideUp("300");
    }
});


$("#left-menu1").click(function () {
    $("#servicesDropdown").hide()
    $("#guidelinesDropdown").hide()
})

/*$("#services").click(function () {
    $("#whyAlhajDropdown").hide()
    $("#guidelinesDropdown").hide()
})

$("#guidelines").click(function () {
    $("#whyAlhajDropdown").hide()
    $("#servicesDropdown").hide()
})*/






