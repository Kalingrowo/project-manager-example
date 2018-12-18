import React, { Component } from 'react';
import { Link } from 'react-router-dom';

const  HeaderX = () => (
  <nav className='navbar navbar-expand-md navbar-light navbar-laravel'>
    <div className='container'>
      <Link className='navbar-brand' to='/'>Tasksman</Link>
    </div>
  </nav>
)

export default HeaderX;
