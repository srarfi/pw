<script>
function submitPost() {
  const author = document.getElementById('postAuthor').value;
  const postContent = document.getElementById('postContent').value;

  if (postContent.trim() !== '') {
    const post = {
      id: Date.now(),
      author: author,
      content: postContent,
      comments: []
    };

    let posts = JSON.parse(localStorage.getItem('posts')) || [];
    posts.push(post);

    localStorage.setItem('posts', JSON.stringify(posts));

    document.getElementById('postContent').value = '';
    displayPosts();
  }


function displayPosts() {
  const postsContainer = document.getElementById('posts');
  postsContainer.innerHTML = '';

  let posts = JSON.parse(localStorage.getItem('posts')) || [];

  posts.forEach(post => {
    const postElement = document.createElement('div');
    postElement.classList.add('post-container');
    postElement.style.border = '1px solid #ccc';
    postElement.style.borderRadius = '10px';
    postElement.style.padding = '20px';
    postElement.style.marginBottom = '20px';
    postElement.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';

    const postContent = document.createElement('div');
    postContent.classList.add('post-content');
    postContent.innerHTML = `
      <h2>Post by ${post.author}</h2>
      <p>${post.content}</p>
    `;

    const commentsList = document.createElement('ul');
    commentsList.classList.add('comments');
    commentsList.id = comments-${post.id};

    const commentInputs = document.createElement('div');
    commentInputs.classList.add('comment-inputs');
    commentInputs.innerHTML = `
      <input type="text" id="commentAuthor-${post.id}" placeholder="Your username">
      <textarea id="commentContent-${post.id}" placeholder="Your comment"></textarea>
      <button class="button" onclick="submitComment(${post.id})">Submit Comment</button>
    `;

    post.comments.forEach(comment => {
      const commentElement = document.createElement('li');
      commentElement.classList.add('comment');
      commentElement.style.border = '1px solid #ccc';
      commentElement.style.borderRadius = '10px';
      commentElement.style.padding = '10px';
      commentElement.style.marginBottom = '10px';
      commentElement.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
      commentElement.innerHTML = `
        <div class="comment-content">
          <h3>Comment by ${comment.author}</h3>
          <p>${comment.content}</p>
        </div>
      `;
      commentsList.appendChild(commentElement);
    });

    postElement.appendChild(postContent);
    postElement.appendChild(commentsList);
    postElement.appendChild(commentInputs);
    postsContainer.appendChild(postElement);
  });
}

function submitComment(postId) {
  const commentAuthor = document.getElementById(commentAuthor-${postId}).value;
  const commentContent = document.getElementById(commentContent-${postId}).value;

  if (commentAuthor.trim() !== '' && commentContent.trim() !== '') {
    let posts = JSON.parse(localStorage.getItem('posts')) || [];
    const post = posts.find(p => p.id === postId);

    if (post) {
      const comment = {
        author: commentAuthor,
        content: commentContent
      };

      post.comments.push(comment);
      localStorage.setItem('posts', JSON.stringify(posts));
      displayPosts();
    }
    


  


displayPosts();
</script>