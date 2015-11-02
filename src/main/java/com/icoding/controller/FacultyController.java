package com.icoding.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.annotation.Secured;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.icoding.service.FacultyService;

@Controller
public class FacultyController {
	
	@Autowired
	private FacultyService facultyService;
	
	@RequestMapping(value = { "/admin/faculty", "/admin/faculty/list" }, method = RequestMethod.GET, produces = "text/plain;charset=UTF-8")
	@Secured("ROLE_ADMIN")
	public String displayPage(Model model) {
		model.addAttribute("pageName", "Manage Faculty");
		model.addAttribute("title", "Manage Faculty");
		return "faculty/index";
	}
}
