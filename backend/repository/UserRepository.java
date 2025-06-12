package com.Assignment2.springboot.backend.repository;

import com.Assignment2.springboot.backend.model.User;
import org.springframework.data.jpa.repository.JpaRepository;


public interface UserRepository extends JpaRepository<User, Integer
        >  {
}
