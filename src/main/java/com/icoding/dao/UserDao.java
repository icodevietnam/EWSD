package com.icoding.dao;

import com.icoding.domain.User;

public interface UserDao extends GenericDao<User, Integer> {
	User getUser(String username);

	User getUser(String username, String password);

}
