package com.icoding.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.access.annotation.Secured;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.icoding.domain.Program;
import com.icoding.service.ProgramService;

@Controller
public class ProgramController {

	@Autowired
	private ProgramService programService;

	@RequestMapping(value = { "/admin/program", "/admin/program/list" }, method = RequestMethod.GET, produces = "text/plain;charset=UTF-8")
	@Secured("ROLE_ADMIN")
	public String displayPage(Model model) {
		model.addAttribute("pageName", "Manage Program");
		model.addAttribute("title", "Manage Program");
		return "program/index";
	}

	@RequestMapping(value = "/program/new", method = RequestMethod.POST)
	@ResponseBody
	public String addrole(@RequestParam(value = "name") String programName,
			@RequestParam(value = "description") String programDescription,
			@RequestParam(value = "typeOfGrade") String typeOfGrade,
			@RequestParam(value = "typeOfConduct") String typeOfConduct,
			@RequestParam(value = "academicYear") String academicYear) {
		Program program = new Program();
		try {
			programService.saveOrUpdate(program);
			return "true";
		} catch (Exception e) {
			return "false";
		}
	}
}
