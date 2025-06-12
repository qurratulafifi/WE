package com.Assignment2.springboot.backend.repository;

import com.Assignment2.springboot.backend.model.Category;
import org.springframework.data.jpa.repository.JpaRepository;


public interface CategoryRepository extends JpaRepository<Category, Integer>  {
}
