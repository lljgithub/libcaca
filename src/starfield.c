/*
 *   ttyvaders     Textmode shoot'em up
 *   Copyright (c) 2002 Sam Hocevar <sam@zoy.org>
 *                 All Rights Reserved
 *
 *   $Id$
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with this program; if not, write to the Free Software
 *   Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 */

#include <stdlib.h>

#include "common.h"

starfield * create_starfield( game *g )
{
    int i;
    starfield *s;

    s = malloc( STARS * sizeof(starfield) );

    for( i = 0; i < STARS; i++ )
    {
        s[i].x = GET_RAND( 0, g->w );
        s[i].y = GET_RAND( 0, g->h );
        s[i].z = GET_RAND( 1, 4 );
        s[i].c = GET_RAND( 6, 8 );
        s[i].ch = GET_RAND( 0, 2 ) ? '.' : '\'';
    }

    return s;
}

void draw_starfield( game *g, starfield *s )
{
    int i;

    for( i = 0; i < STARS; i++ )
    {
        if( s[i].x >= 0 )
        {
            ee_color( s[i].c );
            ee_goto( s[i].x, s[i].y );
            ee_putchar( s[i].ch );
        }
    }
}

void update_starfield( game *g, starfield *s )
{
    int i;

    for( i = 0; i < STARS; i++ )
    {
        if( s[i].x < 0 )
        {
            s[i].x = GET_RAND( 0, g->w );
            s[i].y = 0;
            s[i].z = GET_RAND( 1, 3 );
            s[i].c = GET_RAND( 6, 8 );
            s[i].ch = GET_RAND( 0, 2 ) ? '.' : '\'';
        }
        else if( s[i].y < g->h-1 )
        {
            s[i].y += s[i].z;
        }
        else
        {
            s[i].x = -1;
        }
    }
}

void free_starfield( game *g, starfield *s )
{
    free( s );
}
