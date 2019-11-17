import React, { Component } from 'react';
// import logo from './logo.svg';
import './App.css';
import {
	BrowserRouter,
	Switch,
	Route,
 } from 'react-router-dom'
 import Home from './components/category/category.js'
//  import Dashboard from './components/Dashboard/Dashboard.js'


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
			{/* <Route
				exact
				path='/dashboard'
				render={(props) => <Dashboard />}
			/> */}
		</Switch>
	</BrowserRouter>
	  </div>
	);
  }
}

export default App;
