import React, { useState, useEffect } from 'react'

function Viewer() {
    const [colors, setColors] = useState([]);
    const [image, setImage] = useState('01JJKKV9K3Y6RPPV1XCE6QJ5EJ.jpg');
    const [color, setColor] = useState({});
    const [spinner, setSpinner] = useState(false);
    const [selectedColorId, setSelectedColorId] = useState(null);
    const [fadeTransition, setFadeTransition] = useState(false);
  

    useEffect(() => {
        getData();
    }, [])

    async function getData() {
        setSpinner(true);
        return await fetch('http://localhost:8000/api/view-colors')
            .then(res => res.json())
            .then(data => {
                setColors(data.data);
                
                let initialColor;

                // Get the color from the URL parameter
                const queryString = window.location.search;

                // Create a URLSearchParams object
                const urlParams = new URLSearchParams(queryString);

                // Get specific parameter values
                const paramColor = urlParams.get('color');
                if(paramColor) {
                    initialColor = data.data.find(color => color.id == paramColor);
                    if (!initialColor) {
                        initialColor = data.data[0];
                    }
                } else {
                    initialColor = data.data[0];
                }
                
                setColor(initialColor);
                
                setImage(initialColor.images[0].path);
                setSelectedColorId(initialColor.id);
                setSpinner(false);
            });
    }

    const changeColor = (currentColor) => {
        setSpinner(true);
        setFadeTransition(true);
        setTimeout(() => {
            setColor(currentColor);
            
            setImage(currentColor.images[0].path);
            setSelectedColorId(currentColor.id);

            setFadeTransition(false);
            setSpinner(false);
        }, 300);
    }

    const filterColors = (e) => {
        const searchTerm = e.target.value.toLowerCase();
        if (searchTerm === '') {
            getData();
        } else {
            const filtered = colors.filter(color =>
                color.name.toLowerCase().includes(searchTerm) ||
                color.code.toLowerCase().includes(searchTerm)
            );
            setColors(filtered);
        }
    }

    const clearSearch = () => {
        document.getElementById('searchInput').value = '';
        getData();
    }

    return (
        <div className='container m-auto flex flex-col md:flex-row md:px-4 mt-3'>
            <div className="relative w-full md:w-2/3">
                {
                    spinner ? (
                        <span className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black p-2 opacity-90 z-20">
                            <img src="https://letsdesign.esignserver2.com/images/ajax-loader.gif" alt="" />
                        </span>
                    ) : ''
                }
                <img
                    src={`https://intercocina.com/storage/public/${image}`}
                    alt="Virtual image"
                    className={`w-full h-auto rounded-t-lg shadow-sm transition-opacity duration-100 ease-in-out ${fadeTransition ? 'opacity-95' : 'opacity-100'}`}
                />
                <div className="p-3 bg-white rounded-b-lg flex justify-between">
                    <div>
                        <a href={`https://intercocina.com/product/${color.product_slug}`} className="text-xl flex gap-2 hover:text-red-500" target="_blank" rel="noreferrer">
                            <span>{color.name}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5">
                                    <path d="m8.818 15.182l6.364-6.364m-4.95 0h4.95v4.95"></path>
                                    <path d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div className="text-xl">
                        <span className="text-[#b6b6b7] font-black tracking-widest" style={{ fontFamily: 'DOCK11-Heavy' }}>INTER</span>
                        <span className="text-[#ec2228] font-black tracking-widest" style={{ fontFamily: 'DOCK11-Heavy' }}>COCINA</span>
                    </div>
                </div>
            </div>

            <div className="w-full md:w-1/3 p-4 pt-0">
                <div className="relative mb-4">
                    <input
                        className="appearance-none border-2 pl-10 z-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-red-600 focus:border-red-600 focus:shadow-outline"
                        id="searchInput"
                        type="text"
                        placeholder="Couleur, Référence..."
                        onChange={filterColors}
                    />

                    {/* Search Icon */}
                    <div className="absolute inset-y-0 left-3 flex items-center ml-3">
                        <svg className="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </div>

                    {/* Clear Button */}
                    <div className="absolute inset-y-0 right-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400 hover:text-gray-500 cursor-pointer"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            strokeWidth="2"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            onClick={clearSearch}
                        >
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>

                <div style={{ height: '75vh' }} className="grid grid-cols-3 px-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 pt-3 gap-2 overflow-y-auto max-h-[50hv] sticky top-11 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 hover:scrollbar-thumb-gray-500">
                    {colors.map((colorItem, index) => (
                        <div
                            onClick={() => changeColor(colorItem)}
                            key={index}
                            className={`relative bg-white rounded-lg shadow-sm text-center transform duration-300 hover:-translate-y-1 cursor-pointer snap-center splide__slide shrink-0 ${selectedColorId === colorItem.id ? 'ring-2 ring-red-500 shadow-lg' : ''}`}
                        >
                            {selectedColorId === colorItem.id && (
                                <div className="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            )}
                            <img
                                src={`https://intercocina.com/storage/public/${colorItem.image}`}
                                alt={colorItem.name}
                                className={`w-full h-auto rounded-t-lg`}
                            />
                            <div className="mt-2 pb-2">
                                <span className={`text-sm ${selectedColorId === colorItem.id ? 'text-red-600 font-medium' : 'text-gray-600'}`}>
                                    {colorItem.name}
                                </span>
                                <br />
                                <span className={`text-sm ${selectedColorId === colorItem.id ? 'text-red-600 font-medium' : 'text-gray-600'}`}>
                                    {colorItem.code}
                                </span>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

export default Viewer