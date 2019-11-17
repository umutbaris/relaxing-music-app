import React from 'react'
import axios from 'axios';
import { Result, Button, Card, Tag } from 'antd';
const { Meta } = Card;

class Songs extends React.Component {
	constructor(props) {
		super(props)
		this.state = {
			songs: [],
		}

	}

	componentDidMount(){
		this.getSongsWithCategory()
	}

	async getSongsWithCategory(){
		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		if (tokens === undefined || tokens === null ){
			this.setToken()
			tokens = await JSON.parse(localStorage.getItem('tokens'))
		}

		let search = window.location.search;
		let params = new URLSearchParams(search);
		let categoryId = params.get('category');

		const categories = await axios.get('http://localhost/api/categories/' + categoryId, { headers: { 'Authorization': 'Bearer ' + tokens.token } })
		
		this.setState({
			songs: categories.data.data.songs,

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

	async addFavorites() {
		console.log('favorites')
	}

	render() {
		console.log(this.state.songs)
		
		return (
			<div>

			<Tag className='general-title' color="#87d068">SONGS</Tag>
			{this.state.songs.map(songs => 
			<div key={songs.id}>
				<Card className='song-card'  title={songs.name} bordered={false} style={{ width: 300 }}>
				</Card>
				<Button key={songs.id} className='favorite' type="primary" shape="circle" icon="heart" onClick={this.addFavorites} />
			</div>
			)}

			</div>
		)



	}
}

export default Songs