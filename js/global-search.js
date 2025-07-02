// // global-search.js
// document.addEventListener("DOMContentLoaded", function() {
//     const searchBox = document.getElementById("search_box");
//     if (!searchBox) return;
    
//     // Initialize all elements
//     const elements = {
//         resultsContainer: document.querySelector("#search-result-page"),
//         searchResultText: document.querySelector(".search-num"),
//         searchText: document.querySelector(".search-text"),
//         searchPage: document.querySelector(".search-page"),
//         searchLoader: document.getElementById("SearchloaderOverlay")
//     };
    
//     // State management
//     const state = {
//         currentQuery: '',
//         allProducts: [],
//         currentPage: 1,
//         totalPages: 1,
//         isLoading: false,
//         hasMoreData: true,
//         debounceTimer: null
//     };
    
//     // Core functions
//     const searchFunctions = {
//         getZipCode() {
//             const cookies = document.cookie.split(';');
//             for (let cookie of cookies) {
//                 const [name, value] = cookie.trim().split('=');
//                 if (name === 'zipcode') return value;
//             }
//             return '60611';
//         },
        
//         debounce(callback, delay) {
//             clearTimeout(state.debounceTimer);
//             state.debounceTimer = setTimeout(callback, delay);
//         },
        
//         async fetchProductData(query, page) {
//             if (state.isLoading || !state.hasMoreData) return;
//             state.isLoading = true;
            
//             elements.searchLoader.style.display = 'flex';
//             elements.searchPage.style.display = 'block';
//             if (page === 1) elements.resultsContainer.innerHTML = '';
            
//             try {
//                 const response = await fetch('ajax-search.php', {
//                     method: "POST",
//                     headers: { "Content-Type": "application/json" },
//                     body: JSON.stringify({
//                         uid: sessionStorage.getItem("uid") || "",
//                         token: sessionStorage.getItem("bearer_token") || "",
//                         zipcode: this.getZipCode(),
//                         search: query,
//                         page: page
//                     })
//                 });
                
//                 const data = await response.json();
//                 this.handleResponse(data, query, page);
//             } catch (error) {
//                 console.error("Search error:", error);
//                 if (page === 1) this.renderNoResults(query);
//             } finally {
//                 elements.searchLoader.style.display = 'none';
//                 state.isLoading = false;
//             }
//         },
        
//         handleResponse(data, query, page) {
//             if (data.success && data.lstProducts?.length) {
//                 state.allProducts = [...state.allProducts, ...data.lstProducts];
//                 state.totalPages = Math.ceil(data.totalProds / data.lstProducts.length);
//                 this.renderProducts(data.lstProducts, query, data.totalProds, page === 1);
//                 state.hasMoreData = state.currentPage < state.totalPages;
//             } else if (page === 1) {
//                 this.renderNoResults(query);
//             }
//         },
        
//         renderProducts(products, query, totalProds, isFirstPage) {
//             if (isFirstPage) elements.resultsContainer.innerHTML = '';
            
//             elements.searchResultText.textContent = totalProds;
//             elements.searchText.textContent = query;
            
//             products.forEach(product => {
//                 const slug = product.name.toLowerCase()
//                     .replace(/[^a-z0-9\s-]/g, '')
//                     .replace(/\s+/g, '-')
//                     .replace(/-+/g, '-')
//                     .trim();
                
//                 elements.resultsContainer.insertAdjacentHTML('beforeend', `
//                     <div class="col-md-2 mb-4">
//                         <div class="pro-card">
//                             <a href="/dfi-web/prod-details.php/${slug}/${product.pid}">
//                                 <img src="${product.image}" alt="${product.name}" class="img-fluid">
//                                 <div class="storenamewrap">
//                                     <div class="storename">${product.name}</div>
//                                 </div>
//                             </a>
//                         </div>
//                     </div>
//                 `);
//             });
//         },
        
//         renderNoResults(query) {
//             elements.resultsContainer.innerHTML = `
//                 <div class="col-12">
//                     <div class="no-results">
//                         <p>No products found for "${query}".</p>
//                         <p>Please try a different search term.</p>
//                     </div>
//                 </div>
//             `;
//             elements.searchResultText.textContent = "0";
//             elements.searchText.textContent = query;
//         },
        
//         resetSearchResults() {
//             elements.searchPage.style.display = "none";
//             elements.resultsContainer.innerHTML = "";
//             elements.searchResultText.textContent = "0";
//             elements.searchText.textContent = "";
//             elements.searchLoader.style.display = 'none';
            
//             // Reset state
//             state.currentQuery = '';
//             state.allProducts = [];
//             state.currentPage = 1;
//             state.totalPages = 1;
//             state.hasMoreData = false;
//         }
//     };
    
//     // Event listeners
//     searchBox.addEventListener("input", (e) => {
//         const query = e.target.value.trim();
//         searchFunctions.debounce(() => {
//             if (query.length >= 1) {
//                 state.currentQuery = query;
//                 state.currentPage = 1;
//                 state.allProducts = [];
//                 state.hasMoreData = true;
//                 searchFunctions.fetchProductData(query, 1);
//             } else {
//                 searchFunctions.resetSearchResults();
//             }
//         }, 500);
//     });
    
//     window.addEventListener("scroll", () => {
//         if (!state.isLoading && state.hasMoreData &&
//             window.innerHeight + window.scrollY >= document.body.offsetHeight - 300) {
//             state.currentPage++;
//             searchFunctions.fetchProductData(state.currentQuery, state.currentPage);
//         }
//     });
// });