package com.icoding.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;

@Entity
@Table(name = "program")
public class Program {

	@Id
	@GenericGenerator(name = "seq_id", strategy = "com.icoding.generator.ProgramCodeGenerator")
	@GeneratedValue(generator = "seq_id")
	@Column(name = "code", unique = true, nullable = false, length = 20)
	private String code;

	@Column(name = "name")
	private String name;

	@Column(name = "description")
	private String description;

	@ManyToOne
	@JoinColumn(name = "faculty")
	private Faculty faculty;

	@ManyToOne
	@JoinColumn(name = "pl")
	private User pl;

	@ManyToOne
	@JoinColumn(name = "ee")
	private User ee;

	public String getCode() {
		return code;
	}

	public void setCode(String code) {
		this.code = code;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public Faculty getFaculty() {
		return faculty;
	}

	public void setFaculty(Faculty faculty) {
		this.faculty = faculty;
	}

}
