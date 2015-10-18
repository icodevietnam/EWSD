package com.icoding.controller;

import java.util.ArrayList;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.icoding.domain.User;
import com.icoding.service.RoleService;
import com.icoding.service.UserService;

@Controller
public class UserController {

	@Autowired
	private UserService userService;

	@Autowired
	private RoleService roleService;

	@Autowired
	private BCryptPasswordEncoder encoder;

	@RequestMapping(value = "/user/checkPasswordExist", method = RequestMethod.GET)
	@ResponseBody
	public String checkPasswordExist(
			@RequestParam(value = "oldpassword") String oldPassword) {
		Authentication auth = SecurityContextHolder.getContext()
				.getAuthentication();
		UserDetails userDetails = (UserDetails) auth.getPrincipal();
		User currentUser = userService.getUser(userDetails.getUsername());
		if (encoder.matches(oldPassword, currentUser.getPassword()))
			return "false";
		else
			return "true";
	}

	// Response user as json
	@RequestMapping(value = "/user/getAll", method = RequestMethod.GET, produces = "application/json")
	@ResponseBody
	public List<User> getAll(Model model) {
		List<User> listUsers = new ArrayList<User>();
		listUsers = userService.getAll();
		return listUsers;
	}

	@RequestMapping(value = "/user/delete", method = RequestMethod.POST)
	@ResponseBody
	public String deleteUser(@RequestParam(value = "itemId") String itemId) {
		Integer id = Integer.parseInt(itemId);
		User user = userService.get(id);
		if (!itemId.equalsIgnoreCase("1")) {
			user.setRole(null);
			userService.remove(user);
			return "true";
		}
		return "false";
	}

	@RequestMapping(value = "/user/get", method = RequestMethod.GET)
	@ResponseBody
	public User getUser(@RequestParam(value = "itemId") String idemId) {
		User user = userService.get(Integer.parseInt(idemId));
		return user;
	}

	@RequestMapping(value = "/user/changePassword", method = RequestMethod.POST)
	@ResponseBody
	public String updateUser(@RequestParam(value = "userId") String userId,
			@RequestParam(value = "password") String password) {
		User user = userService.get(Integer.parseInt(userId));
		user.setPassword(encoder.encode(password));
		try {
			userService.update(user);
			return "true";
		} catch (Exception e) {
			return "false";
		}
	}
}
