package com.icoding.service;

import com.icoding.domain.User;

public interface UserService extends GenericService<User, Integer> {
	public User getUser(String username);

	User getUser(String username, String password);

}
