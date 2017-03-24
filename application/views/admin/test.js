/**
 * Created by Administrator on 2017/1/21.
 */
define(function () {
    return $.extend({
        init: Hnb.common.one(function () {
            define(function () {
                return $.extend({
                    init: Hnb.common.one(function () {
                        return this.registerEvent(), Hnb.ui.fixElement($("#national-detail-top"), "nationIndexTopFix"), Hnb.ui.locationMenu($(".c-content-mao"), $(".c-list-mao"), 174), this
                    }), 
					registerEvent: function () {
                        var t = $("#_nt_proj_nav").attr("nation-label"), 
							n = $("#_nt_proj_nav").attr("nation-id"), 
							i = window.location.host, 
							e = window.location.protocol;
							
                        $("#_nt_proj_nav li").mouseover(function () {
                            if (!$(this).hasClass("more")) {
                                var a, o, r = $(this).attr("hnb-value");
                                $("#_nt_proj_nav li").removeClass("active"), $(".dl").hide(), $(this).addClass("active"), $("#prj_example_" + r).show(), a = 0 == r ? 1 : r, o = 11011e3 == t ? e + "//" + i + "/national/immigrate/" + t + "/" + a + ".html?nation_id=" + n : e + "//" + i + "/national/immigrate/" + t + ".html?nation_id=" + n, $("#_more_project_redirect_url").attr("href", o)
                            }
                        }), $(".nationTab-li-a").hover(function () {
                            $(this).parents(".nationTab-li").siblings().removeClass("active").end().addClass("active"), $(".more_guide_content").attr("href", $(this).attr("href"))
                        })
                    }
                }, new Hnb.event)
            });
            return this.registerEvent(), Hnb.ui.fixElement($("#national-detail-top"), "nationIndexTopFix"), Hnb.ui.locationMenu($(".c-content-mao"), $(".c-list-mao"), 174), this
        }),
		registerEvent: function () {
            var t = $("#_nt_proj_nav").attr("nation-label"), n = $("#_nt_proj_nav").attr("nation-id"), i = window.location.host, e = window.location.protocol;
            $("#_nt_proj_nav li").mouseover(function () {
                if (!$(this).hasClass("more")) {
                    var a, o, r = $(this).attr("hnb-value");
                    $("#_nt_proj_nav li").removeClass("active"), 
					$(".dl").hide(), $(this).addClass("active"), 
					$("#prj_example_" + r).show(), 
					a = 0 == r ? 1 : r, 
					o = 11011e3 == t ? e + "//" + i + "/national/immigrate/" + t + "/" + a + ".html?nation_id=" + n : e + "//" + i + "/national/immigrate/" + t + ".html?nation_id=" + n, 
					$("#_more_project_redirect_url").attr("href", o)
                }
            }), 
			$(".nationTab-li-a").hover(function () {
                $(this).parents(".nationTab-li").siblings().removeClass("active").end().addClass("active"),
				$(".more_guide_content").attr("href", $(this).attr("href"))
            })
        }
    }, new Hnb.event)
});