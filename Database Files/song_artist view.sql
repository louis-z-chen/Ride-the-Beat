CREATE VIEW song_artists_view AS

SELECT song.id AS songs_id, song.name AS song_name, spotify_id, artist.name AS artist_name

FROM song, song_artists, artist
WHERE
		song_artists.song_id = song.id
	AND
		song_artists.artist_id = artist.id
        
ORDER BY song.id;