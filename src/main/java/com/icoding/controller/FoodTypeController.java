package com.icoding.controller;

import org.springframework.security.access.annotation.Secured;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
public class FoodTypeController {
	
	@RequestMapping(value = { "/admin/foodtype", "/admin/foodtype/list" }, method = RequestMethod.GET, produces = "text/plain;charset=UTF-8")
	@Secured({ "ROLE_ADMIN"})
	public String displayPage(Model model) {
		model.addAttribute("pageName", "Manage Food Type");
		model.addAttribute("title", "Manage Food Type");
		return "foodtype/index";
	}

}
