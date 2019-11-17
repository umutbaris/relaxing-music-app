import React from 'react'
import axios from 'axios';
import { Result, Button, Card, Tag, message} from 'antd';

class Favorites extends React.Component {
	constructor(props) {
		super(props)
		this.state = {
			favorites:[],
		}
	}

	componentDidMount(){
		this.getFavorites()
	}

	async getFavorites(){
		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		if (tokens === undefined || tokens === null ){
			tokens = await this.setToken()
		}

		const favorites = await axios.get('http://localhost/api/favorites/', { headers: { 'Authorization': 'Bearer ' + tokens.token } })

		this.setState({
			favorites: favorites.data.data,
		})

		return favorites.data.data
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

	async favoritesDelete (favoriteId, songId,) {
		let tokens = await JSON.parse(localStorage.getItem('tokens'))
		
		const response = await axios.request({
			url: 'http://localhost/api/favorites/' + favoriteId,
			method: "DELETE",
			headers : {
				'Content-Type': 'application/json',
				'Authorization': 'Bearer ' + tokens.token
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
			<Card className='general-title' title='FAVORITES' bordered={false} style={{ width: 300 }}></Card>
			{this.state.favorites.map(favorites => 
			<div key={favorites.id}>
				<Card className='song-card' title={favorites.name} bordered={false} style={{ width: 300 }}>
				</Card>
				<Button key={favorites.id} className={'favoriteDelete'}type="primary" shape="circle" icon="heart" onClick={() => this.favoritesDelete(favorites.id, favorites.song_id)} />
			</div>
			)}

			<a href="/favorites" >
			<Button type="primary" className="favorite-button" block>
			Favorites
			</Button>
			</a>

			<a href="/" >
			<Button type="primary" className="favorite-button" block>
			Albums
			</Button>
			</a>
			</div>
		)
	}
}

export default Favorites