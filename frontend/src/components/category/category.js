import React from 'react'
import axios from 'axios';
import { Result, Button, Card } from 'antd';

class Category extends React.Component {
	constructor(props) {
		super(props)
		this.state = {
			categories: [],
		}

	}

	componentDidMount(){
		this.getCategories()
	}

	async getCategories(){

		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		if (tokens === undefined || tokens === null ){
			this.setToken()
			tokens = await JSON.parse(localStorage.getItem('tokens'))
		}

		const categories = await axios.get('http://localhost/api/categories', { headers: { 'Authorization': 'Bearer ' + tokens.token } })
		
		this.setState({
			categories: categories.data.data,

		})
		return categories.data.data
	}

	async setToken() {
		const headers = {
			'Content-Type': 'application/json',
		};

		const response = await axios.request({
			url: 'http://localhost/api/login',
			method: "POST",
			headers : headers,
		});

		const data = response.data
		const tokens = {
			'token': data.token,
			'expires': data.expires,
		}

		localStorage.setItem('tokens', JSON.stringify(tokens))

	}
	

	render() {

		return (
			<div>
			{this.state.categories.map(category => 
				<div class='category-card'>
				<Card title={category.name} bordered={false} style={{ width: 300 }}>
				</Card>
				</div>
			)}


			</div>
		)



	}
}

export default Category