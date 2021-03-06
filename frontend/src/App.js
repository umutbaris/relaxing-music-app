import React, { Component } from 'react';
// import logo from './logo.svg';
import './App.css';
import {
	BrowserRouter,
	Switch,
	Route,
 } from 'react-router-dom'
import Home from './components/category/category.js'
import Songs from './components/category/songs.js'
import Favorites from './components/category/favorites.js'


class App extends Component {
	constructor(props) {
		super(props)

		this.state = {

		}
	}

	render() {
	return (
	  <div className="App">
		<BrowserRouter>
		<Switch>
			<Route
				exact
				path='/'
				render={(props) => <Home />}
			/>
			<Route
				exact
				path='/songs'
				render={(props) => <Songs />}
			/>
			<Route
				exact
				path='/favorites'
				render={(props) => <Favorites />}
			/>
		</Switch>
	</BrowserRouter>
	  </div>
	);
  }
}

export default App;
