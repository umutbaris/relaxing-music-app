import React from 'react'
import axios from 'axios';
import { Result, Button, Card, Tag, message} from 'antd';

class Songs extends React.Component {
	constructor(props) {
		super(props)
		this.state = {
			songs: [],
			favorite: 'favorite-default',
			favorites:[],
		}

	}

	componentDidMount(){
		this.getSongsWithCategory()
	}

	async getSongsWithCategory(){
		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		if (tokens === undefined || tokens === null ){
			tokens = await this.setToken()
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
		
		return tokens
	}

	async favoritesDecider(songId, name, artist, categoryId, method, favoriteId) {

		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		if (tokens === undefined || tokens === null ){
			this.setToken()
			tokens = await JSON.parse(localStorage.getItem('tokens'))
		}

		if (method === 'Add') {
			await this.favoritesAdd(songId, name, artist, categoryId, method, tokens)
		} else {
			await this.favoritesDelete(songId, name, artist, categoryId, method, tokens, favoriteId)
			
		}

	}

	async favoritesAdd (songId, name, artist, categoryId, method, tokens) {
		const response = await axios.request({
			url: 'http://localhost/api/favorites',
			method: "POST",
			headers : {
				'Content-Type': 'application/json',
				'Authorization': 'Bearer ' + tokens.token
			},
			data: {
				'name' : name,
				'artist' : artist,
				'categories_id' : categoryId,
			}
		});

		this.updateFavoriteColumnsOfSong(songId, 'Delete', tokens, response.data.data.id)
		if(response.data.success) {
			message.success('Song added favorites');
			this.setState({
				favorite : 'favorite-add'
			})
		} else {
			message.error('Song can not adding to favorites');
		}

		window.location.reload()
	}

	async favoritesDelete (songId, name, artist, categoryId, method, tokens, favoriteId) {
		const response = await axios.request({
			url: 'http://localhost/api/favorites/' + favoriteId,
			method: "DELETE",
			headers : {
				'Content-Type': 'application/json',
				'Authorization': 'Bearer ' + tokens.token
			},
			data: {
				'name' : name,
				'artist' : artist,
				'categories_id' : categoryId,
			}
		});

		this.updateFavoriteColumnsOfSong(songId, 'Add', tokens)
		if(response.status === 204) {
			message.success('Song Removed favorites');
			this.setState({
				favorite : 'favorite-add'
			})
		} else {
			message.error('Song Can Not Removed From Favorites');
		}

		window.location.reload()
	}

	async updateFavoriteColumnsOfSong(songId, status, tokens, favoriteId){
		await axios.request({
			url: 'http://localhost/api/songs/' + songId,
			method: "PUT",
			headers : {
				'Content-Type': 'application/json',
				'Authorization': 'Bearer ' + tokens.token
			},
			data: {
				'favorite' : status,
				'favoriteId' : favoriteId,
			}
		});
	}

	render() {
		return (
			<div>
			<Tag className='general-title' color="#87d068">SONGS</Tag>
			{this.state.songs.map(songs => 
			<div key={songs.id}>
				<Card className='song-card' title={songs.name} bordered={false} style={{ width: 300 }}>
				</Card>
				<Button key={songs.id} className={'favorite' + songs.favorite}type="primary" shape="circle" icon="heart" onClick={() => this.favoritesDecider(songs.id, songs.name, songs.artist, songs.categories_id, songs.favorite, songs.favoriteId)} />
			</div>
			)}

			</div>
		)
	}
}

export default Songs