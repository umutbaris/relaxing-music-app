import React from 'react'
import axios from 'axios';
import { Result, Button, Card, Tag } from 'antd';
const { Meta } = Card;

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

		console.log(categories.data.data)
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

			<Tag className='general-title' color="#87d068">ALBUMS</Tag>


			{this.state.categories.map(category => 
			 	<a href={'/songs/?category=' + category.id} key={category.id} >
				<Card className='category-card' title={category.name} bordered={false} style={{ width: 300 }}>
				</Card></a> 
			)}

			</div>
		)



	}
}

export default Category