package com.icoding.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import com.icoding.dao.GenericDao;
import com.icoding.dao.UserDao;
import com.icoding.domain.User;

@Service
@Transactional
public class UserServiceImpl extends GenericServiceImpl<User, Integer>
		implements UserService {

	@Autowired
	private UserDao userDao;

	@Override
	public User getUser(String username) {
		return userDao.getUser(username);
	}

	@Override
	public User getUser(String username, String password) {
		return userDao.getUser(username, password);
	}

	@Override
	GenericDao<User, Integer> getDao() {
		return userDao;
	}

}
